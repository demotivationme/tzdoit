<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Odarych
 */
namespace App\Services;

use App\Models\Eloquent\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersService
 * @package App\Models\Services
 */
class UsersService {

    private $filesystem;
    private $model;

    /**
     * UsersService constructor.
     * @param Filesystem $filesystem
     * @param UserRepositoryInterface $model
     */
    public function __construct(Filesystem $filesystem, UserRepositoryInterface $model)
    {
        $this->filesystem = $filesystem;
        $this->model = $model;
    }

    /**
     * @param FormRequest $data
     * @return User
     */
    public function signUp(FormRequest $data) {
        /**
         * Store avatar
         */
        $filename = microtime(true) .'.'. $data->file('avatar')->getClientOriginalExtension();
        $this->filesystem->put( 'avatar/' . $filename, file_get_contents($data->file('avatar')->getRealPath()));
        /**
         * Create user model
         */
        $user = $this->model->create([
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'avatar' => $filename
        ]);
        return $user;
    }

    /**
     * @param FormRequest $data
     * @return User
     * @throws \Exception
     */
    public function signIn(FormRequest $data) {
        $user = $this->model->findWhere(['email'=>$data->email]);

        if(!$user || Hash::check(Hash::make($data->password), $user->password)) {
            throw new \Exception(__('Wrong login/password'));
        }
        return $user;
    }


}
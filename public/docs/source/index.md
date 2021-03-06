---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](https://testapi.beetheswarm.com/doit/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_97ad4c9ccc533033a36a9c2ecd5525ee -->
## api/signin

> Example request:

```bash
curl -X POST "https://testapi.beetheswarm.com/doit/api/signin" \
-H "Accept: application/json" \
    -d "email"="rhianna43@example.org" \
    -d "password"="cumcum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://testapi.beetheswarm.com/doit/api/signin",
    "method": "POST",
    "data": {
        "email": "rhianna43@example.org",
        "password": "cumcum"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
"{\n     \"error\" : {\n            \"status\":false,\n            \"message\":\"\"\n     },\n     \"data\":{\n         \"user\":{\n             \"id\":27,\n             \"email\":\"fake@mail.com\",\n             \"avatar\":\"AVATAR_URL\"},\n         \"token\":\"access_token\"\n    }\n}"
```

### HTTP Request
`POST api/signin`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    password | string |  required  | Minimum: `6`

<!-- END_97ad4c9ccc533033a36a9c2ecd5525ee -->

<!-- START_90f45d502fd52fdc0b289e55ba3c2ec6 -->
## api/signup

> Example request:

```bash
curl -X POST "https://testapi.beetheswarm.com/doit/api/signup" \
-H "Accept: application/json" \
    -d "email"="rhianna43@example.org" \
    -d "password"="cumcum" \
    -d "avatar"="corporis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://testapi.beetheswarm.com/doit/api/signup",
    "method": "POST",
    "data": {
        "email": "mauricio.howell@example.org",
        "password": "corporis",
        "avatar": "corporis"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
"{\n     \"error\" : {\n            \"status\":false,\n            \"message\":\"\"\n     },\n     \"data\":{\n         \"user\":{\n             \"id\":27,\n             \"email\":\"fake@mail.com\",\n             \"avatar\":\"AVATAR_URL\"},\n         \"token\":\"access_token\"\n    }\n}"
```

### HTTP Request
`POST api/signup`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | Maximum: `255`
    password | string |  required  | Minimum: `6`
    avatar | image |  required  | Must be an image (jpeg, png, bmp, gif, or svg) Allowed mime types: `jpeg`, `png`, `jpg`, `gif` or `svg` Maximum: `2048`

<!-- END_90f45d502fd52fdc0b289e55ba3c2ec6 -->

<!-- START_d2c23c6882231699df8c295231bf0f4e -->
## api/send

> Example request:

```bash
curl -X POST "https://testapi.beetheswarm.com/doit/api/send" \
-H "Accept: application/json" \
-H "Authorization: Bearer [token]" \

    -d "names"="accusamus" \
    -d "message"="accusamus" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://testapi.beetheswarm.com/doit/api/send",
    "method": "POST",
    "data": {
        "names": "accusamus",
        "message": "accusamus"
},
    "headers": {
        "accept": "application/json",
        "authorization": "Bearer [token]"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
"{\n     \"error\" : {\n            \"status\":false,\n            \"message\":\"\"\n     },\n     \"data\":{\n         \"emails\": [\"fake@mail.com\"]\n    }\n}"
```

### HTTP Request
`POST api/send`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    names | string |  required  | 
    message | string |  required  | 

<!-- END_d2c23c6882231699df8c295231bf0f4e -->


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
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_1af1a947e16afcb5289fad8940c57ec5 -->
## api/clients
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "Alexane McClure",
                "email": "runte.stefan@example.com",
                "join_date": "2020-05-22",
                "email_verified_at": "2020-05-22T16:40:58.000000Z",
                "created_at": "2020-05-22T16:40:58.000000Z",
                "updated_at": "2020-05-22T16:40:58.000000Z",
                "deleted_at": null
            },
            {
                "id": 2,
                "name": "Donnell Mosciski",
                "email": "ythiel@example.net",
                "join_date": "2020-05-22",
                "email_verified_at": "2020-05-22T16:40:58.000000Z",
                "created_at": "2020-05-22T16:40:58.000000Z",
                "updated_at": "2020-05-22T16:40:58.000000Z",
                "deleted_at": null
            },
            {
                "id": 3,
                "name": "Josephine Schoen",
                "email": "robb.cummerata@example.org",
                "join_date": "2020-05-22",
                "email_verified_at": "2020-05-22T16:40:58.000000Z",
                "created_at": "2020-05-22T16:40:58.000000Z",
                "updated_at": "2020-05-22T16:40:58.000000Z",
                "deleted_at": null
            },
            {
                "id": 4,
                "name": "Anabel Orn",
                "email": "deckow.citlalli@example.net",
                "join_date": "2020-05-22",
                "email_verified_at": "2020-05-22T16:40:58.000000Z",
                "created_at": "2020-05-22T16:40:58.000000Z",
                "updated_at": "2020-05-22T16:40:58.000000Z",
                "deleted_at": null
            },
            {
                "id": 5,
                "name": "Gino Koss",
                "email": "schiller.cale@example.net",
                "join_date": "2020-05-22",
                "email_verified_at": "2020-05-22T16:40:58.000000Z",
                "created_at": "2020-05-22T16:40:58.000000Z",
                "updated_at": "2020-05-22T16:40:58.000000Z",
                "deleted_at": null
            },
            {
                "id": 6,
                "name": "Dr. Sage Bogan I",
                "email": "houston.marquardt@example.com",
                "join_date": "2020-05-22",
                "email_verified_at": "2020-05-22T16:40:58.000000Z",
                "created_at": "2020-05-22T16:40:58.000000Z",
                "updated_at": "2020-05-22T16:40:58.000000Z",
                "deleted_at": null
            },
            {
                "id": 7,
                "name": "Flavie Rogahn",
                "email": "madie.hand@example.net",
                "join_date": "2020-05-22",
                "email_verified_at": "2020-05-22T16:40:58.000000Z",
                "created_at": "2020-05-22T16:40:58.000000Z",
                "updated_at": "2020-05-22T16:40:58.000000Z",
                "deleted_at": null
            }
        ],
        "first_page_url": "http:\/\/localhost\/api\/clients?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/clients?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/clients",
        "per_page": 10,
        "prev_page_url": null,
        "to": 7,
        "total": 7
    }
}
```

### HTTP Request
`GET api/clients`


<!-- END_1af1a947e16afcb5289fad8940c57ec5 -->

<!-- START_6b13045cb0e321d81354d34ba1e56fae -->
## api/payments/client/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/payments/client/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/payments/client/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "uuid": "004c79fc-baa3-471c-8021-8857a219747e",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:58:03.000000Z",
            "updated_at": "2020-05-22T17:58:03.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "1a931e30-41a7-41e1-be0d-ea9be234a961",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T16:41:13.000000Z",
            "updated_at": "2020-05-22T16:41:13.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "281f91df-53aa-4a55-aee7-e94050c82c5b",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:43:24.000000Z",
            "updated_at": "2020-05-22T17:43:24.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "2964f6c5-0a9c-4ec6-8ff2-19209aafd64c",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:43:21.000000Z",
            "updated_at": "2020-05-22T17:43:21.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "3345fec6-64ad-4795-9169-9597ba0774a4",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:43:33.000000Z",
            "updated_at": "2020-05-22T17:43:33.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "45b74457-2f12-48cd-b40e-bb67bb07ef0a",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:57:33.000000Z",
            "updated_at": "2020-05-22T17:57:33.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "64aa43a9-30d4-41de-a838-bef14b417e99",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:06:51.000000Z",
            "updated_at": "2020-05-22T17:06:51.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "9078be5f-91f3-4a6f-b172-a3bd0e2512fb",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:43:36.000000Z",
            "updated_at": "2020-05-22T17:43:36.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "ae2f81ee-96e5-4225-a5c3-efe96c14c802",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:43:54.000000Z",
            "updated_at": "2020-05-22T17:43:54.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "b4ca3a76-3d11-4311-a6e2-93b4bd5267fa",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:44:35.000000Z",
            "updated_at": "2020-05-22T17:44:35.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "e6cd0469-cc2d-4856-b01c-1da879acdd77",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:23:20.000000Z",
            "updated_at": "2020-05-22T17:23:20.000000Z",
            "deleted_at": null
        },
        {
            "uuid": "fe9243e0-8cba-4e1b-aecf-b87b2bca79e9",
            "payment_date": "2020-05-22",
            "expires_at": "2020-05-22",
            "clp_usd": 806.17,
            "status": "pending",
            "user_id": 1,
            "created_at": "2020-05-22T17:22:33.000000Z",
            "updated_at": "2020-05-22T17:22:33.000000Z",
            "deleted_at": null
        }
    ]
}
```

### HTTP Request
`GET api/payments/client/{id}`


<!-- END_6b13045cb0e321d81354d34ba1e56fae -->

<!-- START_8ce3f6967282118d38a05578b5f07ee2 -->
## api/payments
> Example request:

```bash
curl -X POST \
    "http://localhost/api/payments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/payments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/payments`


<!-- END_8ce3f6967282118d38a05578b5f07ee2 -->



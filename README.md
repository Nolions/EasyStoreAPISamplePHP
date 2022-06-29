# EasyStoreAPISample

## Deploy Guide

1. run `composer install`

2. 環境變數設定

run `cp .env.example .env`

修改`.env`中以下變數值 `EASY_STORE_SHOP_NAME`、`EASY_STORE_CLIENT_ID`、`EASY_STORE_SCOPES`、`EASY_STORE_REDIRECT_URL`、`EASY_STORE_SECRET`

3. run `php -S localhost:8000 -t public/` 

## use

| API | Method | Describe |
| --- | ------ | -------- |
| /oauth | GET | oAuth，會重新定向到指定url，並取得 `HMAC` 值|
| /accessToken?hmac=`HMAC` | GET | 取得access token，`HMAC`值由/oauth取得|

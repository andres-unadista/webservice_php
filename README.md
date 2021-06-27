# webservice_php
Webservice Rest PHP
# STEPS
- import script database
- All articles: GET `http:localhost\name_project?op=getAll`
- Get article: GET `http:localhost\name_project?op=getArticle` AND SEND body in format JSON with Postman `{"id": 1}`
- Create article: POST `http:localhost\name_project?op=createArticle` AND SEND body in format JSON with Postman `{"title": "update","description": "description 2"}`
- Update article: POST `http:localhost\name_project?op=udpateArticle` AND SEND body in format JSON with Postman `{"id": 1,"title": "update","description": "description 2"}`
- Delete article: POST `http:localhost\name_project?op=deleteArticle` AND SEND body in format JSON with Postman `{"id": 1}`

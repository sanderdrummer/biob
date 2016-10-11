module WP {
    'use strict';

    export class PostService {

        static $inject = ['$http', 'apiUrl'];
        constructor(private $http: ng.IHttpService, private apiUrl) {}

        getPost(id) {
            return this.$http.get(this.apiUrl + 'posts/' + id, {
                cache: true
            });
        }
    }

    angular.module('wpBlog')
        .service('postService', PostService);
}
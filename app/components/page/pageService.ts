module WP {
    'use strict';

    export class PageService {

        static $inject = ['$http', 'apiUrl'];
        constructor(private $http: ng.IHttpService, private apiUrl) {}

        getPage(id) {
            return this.$http.get(this.apiUrl + 'pages/' + id, {
                params: {},
                cache: true
            });
        }
    }

    angular.module('wpBlog')
        .service('pageService', PageService);
}
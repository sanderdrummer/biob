module WP {
    'use strict';

    export class PostsService {

        static $inject = ['$http', 'apiUrl'];
        constructor(private $http: ng.IHttpService, private apiUrl) {}

        getPosts(category:string, page:number, query:string) {
            return this.$http.get(this.apiUrl + 'posts', {
                params: {
                    'filter[category_name]': category,
                    'page': page.toString(),
                    'query': query
                },
                cache: true
            });
        }
    }

    angular.module('wpBlog')
        .service('postsService', PostsService);
}
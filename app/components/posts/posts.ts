
module WP {

    class Posts implements ng.IComponentController{

        page: number;
        pages: number;
        query: string;
        list: Object[];
        active: {};
        loading: boolean;
        category: string;

        static $inject = [
            '$stateParams',
            'postsService',
            'appCache'
        ];
        constructor(
            private $stateParams,
            private postsService,
            private appCache
        ) {
            this.page = 1;
            this.query = '';
            this.list = [];
        }

        $onInit() {
            this.getPosts();
        }

        getPosts() {
            this.loading = true;
            this.postsService.getPosts(this.$stateParams.category, this.page, this.query)
                .then(res => {
                    this.category = this.$stateParams.category;
                    this.appCache.cacheList(res.data);
                    this.list = this.list.concat(res.data);
                    this.pages = res.headers('X-WP-TotalPages');
                    this.loading = false;
                }, () => {
                    this.loading = false;
                });
        }

        nextPage() {
            this.page += 1;
            this.getPosts();
        }

        showPost() {
            document.body.classList.add('noScroll');
        }
    }

    angular.module('wpBlog')
        .component('posts', {
            templateUrl: 'components/posts/posts.html',
            controller: Posts,
            controllerAs: 'posts',
        });
}
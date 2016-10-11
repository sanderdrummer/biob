
module WP {

    class Post implements ng.IComponentController{

        active: {};

        static $inject = [
            '$stateParams',
            'postService',
            'appCache'
        ];
        constructor(
            private $stateParams,
            private postService,
            private appCache
        ) {

        }

        $onInit() {
            const id = this.$stateParams.id;
            console.log(id, this.appCache.cache.get(id)  );
            if (this.appCache.cache.get(id)) {
                this.active = this.appCache.cache.get(id);
            } else {
                this.postService.getPost(id)
                .then(res => {
                    this.active = res.data;
                })
            }
        }

        back() {
            history.back();
        }
    }

    angular.module('wpBlog')
        .component('post', {
            templateUrl: 'components/post/post.html',
            controller: Post,
            controllerAs: 'post',
        });
}
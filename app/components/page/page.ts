
module WP {

    class Page implements ng.IComponentController{

        static $inject = [
            '$stateParams',
            'pageService'
        ];
        constructor(
            private $stateParams,
            private pageService
        ) {

        }

        $onInit() {
            this.pageService.getPage(this.$stateParams.id)
            .then(res => {
                console.log(res.data);
                console.log(res.headers('X-WP-TotalPages'));
            })
        }
    }

    angular.module('wpBlog')
        .component('page', {
            templateUrl: 'components/page/page.html',
            controller: Page,
            controllerAs: 'page',
        });
}
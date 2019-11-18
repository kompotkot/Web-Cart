Vue.component('error', {
    data() {
        return {
            showError: false,
            errorMsg: '',
        }
    },
    template: `
        <div class="error" v-show="showError">
            <p>{{this.errorMsg}}</p>
        </div>
    `
});

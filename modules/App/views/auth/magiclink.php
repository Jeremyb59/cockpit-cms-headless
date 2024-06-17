
<vue-view class="kiss-cover kiss-flex kiss-flex kiss-flex-middle kiss-flex-center">

    <template>
        <div class="animated pulse kiss-width-3-4 kiss-width-1-2@m kiss-width-1-4@xl">

            <div class="kiss-flex kiss-flex-middle kiss-margin-large" gap>
                <div><img class="app-logo" src="<?= $this->helper('theme')->logo() ?>" style="height:40px;width:auto;" alt="Logo"></div>
                <div>
                    <strong class="kiss-size-5"><?= $this['app.name'] ?></strong>
                    <div class="kiss-color-muted kiss-size-xsmall kiss-margin-xsmall"><?=t('Enter your email to receive a magic link for signing in')?></div>
                </div>
            </div>

            <form :class="{'kiss-disabled': loading}" @submit.prevent="sendLink" v-if="!sent">

                <div class="kiss-margin">
                    <input type="email" name="email" class="kiss-input kiss-form-large" placeholder="<?=t('Your Email')?>" autofocus required v-model="email">
                </div>

                <div>
                    <button type="submit" class="kiss-button kiss-button-primary kiss-width-expand"><?=t('Send link')?></button>
                    <div class="kiss-align-center kiss-margin">
                        <a class="kiss-size-small kiss-color-muted" href="<?=$this->route('/auth/login')?>"><?=t('Back to normal login')?></a>
                    </div>
                </div>

            </form>

            <kiss-card class="kiss-padding kiss-align-center kiss-text-bold animated fadeIn" theme="shadowed contrast" v-if="sent">
                <?=t('Check your inbox')?>
            </kiss-card>

            <app-loader class="kiss-margin-top" :class="{'kiss-invisible': !loading}"></app-loader>

        </div>


    </template>

    <script type="module">

        export default {

            data() {
                return {
                    sent: false,
                    email: null,
                    loading: false
                }
            },

            methods: {
                sendLink() {

                    this.loading = true;

                    this.$request('/auth/magiclink',{
                        email: this.email,
                        csrf: "<?= $csrfToken ?>"
                    }).then(() => {
                        this.sent = true;
                    }).finally(() => {
                        this.loading = false;
                    });
                }
            }
        }
    </script>


</vue-view>

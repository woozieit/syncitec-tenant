<template>
    <div>
        <div class="text-center">
            <div>
                <a href="/" class="logo">
                    <img src="/images/logo-dark.png" height="20" alt="logo" />
                </a>
            </div>

            <h4 class="font-size-18 mt-4">¡Bienvenido!</h4>
            <p class="text-muted">Inicie sesión para continuar a Nazox.</p>
        </div>

        <div class="p-2 mt-5">
            <form class="form-horizontal" @submit.prevent="submit">

                <div class="form-group auth-form-group-custom mb-4">
                    <i class="ri-user-line auti-custom-input-icon"></i>
                    <label for="email">Usuario</label>
                    <input type="text"
                        v-model.trim="$v.form.username.$model"
                        class="form-control"
                        :class="{ 'is-invalid': $v.form.username.$error }"
                        placeholder="Ingrese usuario"
                        autofocus autocomplete="off" >
                    <div class="invalid-feedback" v-if="!$v.form.username.required">Field is required</div>
                    <div class="invalid-feedback" v-if="form.errors.username" >{{ form.errors.username }}</div>
                </div>

                <div class="form-group auth-form-group-custom mb-4">
                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                    <label for="userpassword">Contraseña</label>
                    <input type="password"
                        v-model="$v.form.password.$model"
                        class="form-control"
                        placeholder="Ingrese contraseña"
                        autocomplete="current-password" >
                    <div class="invalid-feedback" v-if="!$v.form.password.required">Field is required</div>
                    <div v-if="form.errors.password" class="invalid-feedback">{{ form.errors.password }}</div>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customControlInline" v-model="form.remember"/>
                    <label class="custom-control-label" for="customControlInline">Recordar</label>
                </div>

                <div class="mt-4 text-center">
                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit" :disabled="form.processing">Ingresar</button>
                </div>

                <div class="mt-4 text-center">
                    <inertia-link tag="a" href="/forgot-password" class="text-muted">
                        <i class="mdi mdi-lock mr-1"></i> ¿Olvidó su contraseña?
                    </inertia-link>
                </div>

            </form>
        </div>

        <div class="mt-5 text-center">
            <p>
                © 2021 BOTComers. Crafted with
                <i class="mdi mdi-heart text-danger"></i> by Woozie IT
            </p>
        </div>
    </div>
</template>

<script>
    import Layout from '@/Shared/LoginLayout'
    import { required } from 'vuelidate/lib/validators'
    export default {
        metaInfo: { title: 'Login Admin' },
        layout: Layout,
        data() {
            return {
                form: this.$inertia.form({
                    username: '',
                    password: '',
                    remember: false
                })
            }
        },
        validations: {
            form: {
                username: { required },
                password: { required },
            }
        },
        created() {
            document.body.classList.add("auth-body-bg");
        },
        methods: {
            async submit() {

                this.submitted = true

                // stop here if form is invalid
                this.$v.form.$touch()

                if ( !this.$v.form.$invalid ) {

                    await this.form
                        .transform(data => ({
                            ... data,
                            remember: data.remember ? 'on' : ''
                        }))
                        .post(this.route('admin.login.submit'), {
                            onFinish: () => {

                                this.$swal('Hello Vue world!!!');

                                this.form.reset('password')


                            }
                        })
                }
            }
        }
    }
</script>

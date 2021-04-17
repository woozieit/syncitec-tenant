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
                    <input type="text" v-model="form.username" class="form-control" id="username" placeholder="Ingrese usuario" :class="{ 'is-invalid': form.errors.username }" required autofocus />
                    <div v-if="form.errors.username" class="invalid-feedback">{{ form.errors.username }}</div>
                </div>

                <div class="form-group auth-form-group-custom mb-4">
                    <i class="ri-lock-2-line auti-custom-input-icon"></i>
                    <label for="userpassword">Contraseña</label>
                    <input v-model="form.password" type="password" class="form-control" id="userpassword" placeholder="Ingrese contraseña" :class="{ 'is-invalid': form.errors.password }" required autocomplete="current-password"/>
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

    export default {
        metaInfo: { title: 'Login Admin' },
        components: {

        },
        layout: Layout,
        data() {
            return {
                form: this.$inertia.form({
                    username: null,
                    password: null,
                    remember: false
                })
            }
        },
        created() {
            document.body.classList.add("auth-body-bg");
        },
        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: data.remember ? 'on' : ''
                    }))
                    .post(this.route('admin.login.submit'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>

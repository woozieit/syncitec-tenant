<template>
    <login-layout title="Login Admin">

        <div>
            <div class="text-center">
                <div>
                    <a href="/" class="logo">
                        <img src="./images/logo-dark.png" height="20" alt="logo" />
                    </a>
                </div>

                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                <p class="text-muted">Sign in to continue to Nazox.</p>
            </div>

            <div class="p-2 mt-5">
                <form class="form-horizontal" @submit.prevent="tryToLogIn">
                    <div class="form-group auth-form-group-custom mb-4">
                        <i class="ri-mail-line auti-custom-input-icon"></i>
                        <label for="email">Email</label>
                        <input
                        type="email"
                        v-model="email"
                        class="form-control"
                        id="email"
                        placeholder="Enter email"
                        :class="{ 'is-invalid': submitted && $v.email.$error }"
                        />
                        <div v-if="submitted && $v.email.$error" class="invalid-feedback">
                        <span v-if="!$v.email.required">Email is required.</span>
                        <span v-if="!$v.email.email">Please enter valid email.</span>
                        </div>
                    </div>

                    <div class="form-group auth-form-group-custom mb-4">
                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                        <label for="userpassword">Password</label>
                        <input
                        v-model="password"
                        type="password"
                        class="form-control"
                        id="userpassword"
                        placeholder="Enter password"
                        :class="{ 'is-invalid': submitted && $v.password.$error }"
                        />
                        <div
                        v-if="submitted && !$v.password.required"
                        class="invalid-feedback"
                        >Password is required.</div>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input
                        type="checkbox"
                        class="custom-control-input"
                        id="customControlInline"
                        />
                        <label
                        class="custom-control-label"
                        for="customControlInline"
                        >Recordar</label>
                    </div>

                    <div class="mt-4 text-center">
                        <button
                        class="btn btn-primary w-md waves-effect waves-light"
                        type="submit"
                        >Ingresar</button>
                    </div>

                    <div class="mt-4 text-center">
                        <inertia-link tag="a" href="/forgot-password" class="text-muted">
                        <i class="mdi mdi-lock mr-1"></i> Forgot your password?
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

    </login-layout>
</template>

<script>
  import LoginLayout from '@/Layouts/LoginLayout'

  export default {
    components: {
      LoginLayout,
    },
    data() {
        return {
            email: "angelitp.arp.0704@gmail.com",
            password: "password",
            submitted: false
        };
    }
  }
</script>

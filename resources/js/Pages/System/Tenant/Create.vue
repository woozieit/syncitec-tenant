<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Nuevo Registro: Empresas</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <inertia-link :href="route('admin.dashboard')">Inicio</inertia-link>
                            </li>
                            <li class="breadcrumb-item">
                                <inertia-link :href="route('admin.tenants.index')">Empresa</inertia-link>
                            </li>
                            <li class="breadcrumb-item active">
                                <span aria-current="location">Crear</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card border border-primary">
                    <div class="card-header border-primary">
                        <h5 class="my-0 text-primary">
                            <i class="mdi mdi-bullseye-arrow mr-3"></i>
                            Gestión de Empresa
                        </h5>
                    </div>
                    <div class="card-body">
                        <form role="form" class="form-horizontal" @submit.prevent="submit">

                            <div class="row">

                                <div class="col-md-4">
                                    <h5 class="text-info mb-4">Datos de la empresa</h5>

                                    <b-form-group label-cols-lg="2" label="Dominio">
                                        <b-form-input v-model="form.subdomain" required></b-form-input>
                                        <div v-if="form.errors.subdomain">{{ form.errors.subdomain }}</div>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Razón Social">
                                        <b-form-input v-model="form.razon_social_business" required></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Dirección">
                                        <b-form-input v-model="form.address_business"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="País">
                                        <b-form-input v-model="form.country_business"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="RUC">
                                        <b-form-input v-model="form.document_business"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Correo">
                                        <b-form-input type="email" v-model="form.email_business"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Teléfono">
                                        <b-form-input type="tel" v-model="form.phone_business"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Nombre Comercial">
                                        <b-form-input v-model="form.name_business"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Estado">
                                        <b-form-select v-model="form.status">
                                            <b-form-select-option value="active">Activo</b-form-select-option>
                                            <b-form-select-option value="inactive">Inactivo</b-form-select-option>
                                            <b-form-select-option value="demo">Demo</b-form-select-option>
                                        </b-form-select>
                                    </b-form-group>

                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-info mb-4">Datos del dueño</h5>

                                    <b-form-group label-cols-lg="2" label="Nombres">
                                        <b-form-input v-model="form.name_manager"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Apellidos">
                                        <b-form-input v-model="form.lastname_manager"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Correo">
                                        <b-form-input type="email" v-model="form.email_manager"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Teléfono">
                                        <b-form-input type="tel" v-model="form.phone_manager"></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Tipo de Documento">
                                        <b-form-select v-model="form.type_document_manager">
                                            <b-form-select-option value="DNI">DNI</b-form-select-option>
                                            <b-form-select-option value="RUC">RUC</b-form-select-option>
                                            <b-form-select-option value="CE">CE</b-form-select-option>
                                        </b-form-select>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Número de Documneto">
                                        <b-form-input v-model="form.document_manager"></b-form-input>
                                    </b-form-group>

                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-info mb-4">Datos del pago</h5>

                                    <b-form-group label-cols-lg="2" label="Cuenta">
                                        <b-form-select v-model="form.account_id" required>
                                            <template #first>
                                                <b-form-select-option :value="null" disabled>-- Seleccione una opción --</b-form-select-option>
                                            </template>
                                            <b-form-select-option v-for="item in accounts" :key="item.id" :value="item.id">{{ item.name_account }}</b-form-select-option>
                                        </b-form-select>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Fecha de vencimiento">
                                        <b-form-input type="date" v-model="form.due_date" required></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Día de pago">
                                        <b-form-input type="number" step="1" min="1" max="31" v-model="form.day_pay" required></b-form-input>
                                    </b-form-group>

                                    <b-form-group label-cols-lg="2" label="Monto">
                                        <b-form-input type="number" v-model="form.monto" required></b-form-input>
                                    </b-form-group>
                                </div>
                            </div>

                            <div class="form-row form-group my-5">
                                <button type="submit" class="btn btn-primary" :disabled="form.processing">Guardar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "@/Shared/SystemLayout";

export default {
    metaInfo: { title: "Empresas" },
    layout: Layout,
    props: {
        accounts: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                name_manager: '',
                lastname_manager: '',
                email_manager: '',
                phone_manager: '',
                type_document_manager: 'DNI',
                document_manager: '',
                razon_social_business: '',
                address_business: '',
                name_business: '',
                phone_business: '',
                birthday_business: '',
                email_business: '',
                document_business: '',
                country_business: '',
                subdomain: '',
                logo: '',
                status: 'active',
                color_business: '',
                account_id: '',
                due_date: '',
                day_pay: '',
                monto: '',
                sede_id: 1
            }),
        }
    },
    methods: {
        async submit() {
            this.form
                .post(this.route('admin.tenants.store'), {
                    onFinish: () => this.form.reset('name_manager'),
                })
        }
    }
}
</script>

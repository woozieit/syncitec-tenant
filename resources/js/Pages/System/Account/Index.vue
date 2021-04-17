<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Cuentas</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <inertia-link :href="route('admin.dashboard')">Inicio</inertia-link>
                            </li>
                            <li class="breadcrumb-item active">
                                <span aria-current="location">Cuentas</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5">
                <div class="card border border-primary">
                    <div class="card-header border-primary">
                        <h5 class="my-0 text-primary">
                            <i class="mdi mdi-bullseye-arrow mr-3"></i>
                            Gestión de Cuenta
                        </h5>
                    </div>
                    <div class="card-body">
                        <form role="form" class="form-horizontal" @submit.prevent="submit">

                            <div role="group" class="form-row form-group">
                                <label class="col-sm-2 col-lg-2 col-form-label">Banco <span class="text-danger"> *</span></label>
                                <div class="bv-no-focus-ring col">
                                    <input type="text" class="form-control" v-model="form.bank" required>
                                </div>
                            </div>

                            <b-form-group
                                id="example text"
                                label-cols-sm="2"
                                label-cols-lg="2"
                                label="Text"
                                label-for="text"
                            >
                                <b-form-input for="text" value="Artisanal kale"></b-form-input>
                            </b-form-group>

                            <div role="group" class="form-row form-group">
                                <label class="col-sm-2 col-lg-2 col-form-label">Número de cuenta <span class="text-danger"> *</span></label>
                                <div class="bv-no-focus-ring col">
                                    <input type="text" class="form-control" v-model="form.number_account" required>
                                </div>
                            </div>

                            <div role="group" class="form-row form-group">
                                <label class="col-sm-2 col-lg-2 col-form-label">Titular <span class="text-danger"> *</span></label>
                                <div class="bv-no-focus-ring col">
                                    <input type="text" class="form-control" v-model="form.name_account" required>
                                </div>
                            </div>

                            <div role="group" class="form-row form-group">
                                <label class="col-sm-2 col-lg-2 col-form-label">CCI</label>
                                <div class="bv-no-focus-ring col">
                                    <input type="text" class="form-control" v-model="form.cci">
                                </div>
                            </div>

                             <div role="group" class="form-row form-group">
                                <label class="col-sm-2 col-lg-2 col-form-label">RUC</label>
                                <div class="bv-no-focus-ring col">
                                    <input type="text" class="form-control" v-model="form.ruc">
                                </div>
                            </div>

                            <div role="group" class="form-row form-group">
                                <label class="col-sm-2 col-lg-2 col-form-label">Usuario SUNAT</label>
                                <div class="bv-no-focus-ring col">
                                    <input type="text" class="form-control" v-model="form.user_sunat">
                                </div>
                            </div>

                            <div role="group" class="form-row form-group">
                                <label class="col-sm-2 col-lg-2 col-form-label">Contraseña SUNAT</label>
                                <div class="bv-no-focus-ring col">
                                    <input type="text" class="form-control" v-model="form.pass_sunat">
                                </div>
                            </div>

                            <div class="form-check mb-3">
                                <input type="checkbox" id="chk_status" class="form-check-input" v-model="form.status">
                                <label for="chk_status" class="form-check-label">Activo</label>
                            </div>

                            <div class="form-row form-group mt-4">
                                <label class="col-sm-2 col-lg-2 col-form-label"></label>
                                <div class="bv-no-focus-ring col">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card border border-primary">
                    <div class="card-header border-primary">
                        <h5 class="my-0 text-primary">
                            <i class="ri-file-list-3-line mr-3"></i>
                            Lista de Cuentas
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table p-0 mb-0">
                                <thead>
                                    <tr>
                                        <th>Banco</th>
                                        <th>Número de cuenta</th>
                                        <th>Titular</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) of accounts" :key="index">
                                        <th scope="row">{{ item.bank }}</th>
                                        <td>{{ item.number_account }}</td>
                                        <td>{{ item.name_account }}</td>
                                        <td>
                                            <template v-if="item.status">
                                                <span class="badge badge-success">Activo</span>
                                            </template>
                                            <template v-if="!item.status">
                                                <span class="badge badge-danger">Inactivo</span>
                                            </template>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><i class="ri-pencil-line"></i> Editar</button>
                                            <button class="btn btn-danger btn-sm" @click="remove( item.id )"><i class="ri-delete-bin-line"></i> Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from "@/Shared/SystemLayout";

export default {
    metaInfo: { title: "Cuentas" },
    layout: Layout,
    props: {
        accounts: Array
    },
    data() {
        return {
            form: this.$inertia.form({
                bank: null,
                number_account: null,
                name_account: null,
                cci: null,
                ruc: null,
                user_sunat: null,
                pass_sunat: null,
                status: false
            }),
        }
    },
    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ... data,
                    status: data.status ? true : false
                }))
                .post(this.route('admin.accounts.store'), {
                    onFinish: () => this.form.reset('bank'),
                })
        },
        remove( id ) {
            alert(id);
        }
    }
}
</script>

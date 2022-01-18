<template>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Empresas</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <inertia-link :href="route('admin.dashboard')">Inicio</inertia-link>
                            </li>
                            <li class="breadcrumb-item">
                                <span aria-current="location">Empresas</span>
                            </li>
                            <li class="breadcrumb-item active">
                                <span aria-current="location">Lista</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Total</p>
                                <h4 class="mb-0">{{ tenant_total }}</h4>
                            </div>
                            <div class="text-primary">
                                <i class="ri-user-line font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Activos</p>
                                <h4 class="mb-0">{{ tenant_active }}</h4>
                            </div>
                            <div class="text-primary">
                                <i class="ri-user-star-line font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Prueba</p>
                                <h4 class="mb-0">{{ tenant_demo }}</h4>
                            </div>
                            <div class="text-primary">
                                <i class="ri-user-search-line font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Inactivos</p>
                                <h4 class="mb-0">{{ tenant_inactive }}</h4>
                            </div>
                            <div class="text-primary">
                                <i class="ri-user-unfollow-line font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body overflow-hidden">
                                <p class="text-truncate font-size-14 mb-2">Retirados</p>
                                <h4 class="mb-0">{{ tenant_retired }}</h4>
                            </div>
                            <div class="text-primary">
                                <i class="ri-user-shared-line font-size-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card border border-primary">
                    <div class="card-header border-primary">
                        <h5 class="my-0 text-primary">
                            <i class="ri-file-list-3-line mr-3"></i>
                            Lista de Empresas
                        </h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <inertia-link :href="route('admin.tenants.create')" class="btn btn-success mb-2"><i class="mdi mdi-plus mr-2"></i> Nuevo Registro </inertia-link>
                        </div>
                        <div class="table-responsive mt-4">
                            <table class="table p-0 mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Dominio</th>
                                        <th>Nombre</th>
                                        <th>Día de pago</th>
                                        <th>Monto</th>
                                        <th>Banco</th>
                                        <th>Responsable</th>
                                        <th>Vigente</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) of tenants" :key="index">
                                        <td>
                                            <template v-if="item.status == 'active'">
                                                <span class="badge badge-success">&nbsp;</span>
                                            </template>
                                            <template v-if="item.status == 'inactive'">
                                                <span class="badge badge-danger">&nbsp;</span>
                                            </template>
                                            <template v-if="item.status == 'demo'">
                                                <span class="badge badge-warning">&nbsp;</span>
                                            </template>
                                            <template v-if="item.status == 'retired'">
                                                <span class="badge badge-dark">&nbsp;</span>
                                            </template>
                                        </td>
                                        <td>{{ item.subdomain }}</td>
                                        <td>{{ item.name_business }}</td>
                                        <td>{{ item.day_pay }}</td>
                                        <td>{{ item.monto }}</td>
                                        <td>{{ item.account.bank }}</td>
                                        <td>{{ item.account.name_account }}</td>
                                        <td>{{ item.created_at }}</td>
                                        <td>
                                            <inertia-link :href="route('admin.tenants.show', item.id)" class="btn btn-info btn-sm"><i class="ri-eye-line"></i></inertia-link>
                                            <button class="btn btn-primary btn-sm"><i class="ri-pencil-line"></i></button>
                                            <button class="btn btn-danger btn-sm" @click="remove( item.id )"><i class="ri-delete-bin-line"></i></button>
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
    metaInfo: { title: "Empresas" },
    layout: Layout,
    props: {
        tenants: Array,
        tenant_total: Number,
        tenant_active: Number,
        tenant_inactive: Number,
        tenant_demo: Number,
        tenant_retired: Number,
    },
    methods: {
        remove( id ) {
            alert(id);
        }
    }
}
</script>

<template>
    <div>

        <b-alert v-if="$page.props.flash.success && show" show variant="success">{{ $page.props.flash.success }}</b-alert>

        <div v-if="( $page.props.flash.error || Object.keys($page.props.errors).length > 0 ) && show">
            <b-alert v-if="$page.props.flash.error" show variant="danger">{{ $page.props.flash.error }}</b-alert>
            <div v-else>
                <b-alert v-if="Object.keys($page.props.errors).length === 1" show variant="danger">Hay un error en el formulario</b-alert>
                <b-alert v-else show variant="danger">There are {{ Object.keys($page.props.errors).length }} form errors.</b-alert>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: true,
            }
        },
        watch: {
            '$page.props.flash' : {
                handler() {
                    this.show = true
                },
                deep: true,
            },
        },
    }
</script>

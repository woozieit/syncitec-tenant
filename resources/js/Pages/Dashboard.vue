<template>
    <div class="container mt-5">
        Welcome amiguitos
    </div>
</template>

<script>
    export default {
        computed: {
        user() {
            return this.$page.props.auth.user
        }
        }
    }
</script>

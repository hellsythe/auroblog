<template>
    <div v-highlight>
        <slot></slot>
    </div>
</template>

<script>
    import Prism from 'prismjs';
    import 'vue-code-highlight/themes/prism-tomorrow.css';
    import 'prism-es6/components/prism-markup-templating';
    import 'prism-es6/components/prism-php';
    import 'prism-es6/components/prism-css';

    export default {

    }

</script>

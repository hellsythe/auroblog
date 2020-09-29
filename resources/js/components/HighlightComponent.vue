<template>
    <div>
        <vue-code-highlight :language="language">
            <slot></slot>
        </vue-code-highlight>
    </div>
</template>

<script>
    import Prism from 'prismjs';
    import 'vue-code-highlight/themes/prism-tomorrow.css';
    import 'prism-es6/components/prism-markup-templating';
    import 'prism-es6/components/prism-php';
    import 'prism-es6/components/prism-css';
    import { component as VueCodeHighlight } from 'vue-code-highlight';

    export default {
        props: ['language'],
        components: {
            VueCodeHighlight
        },
    }
</script>

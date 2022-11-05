<template>
    <textarea name="editor1" id="editor1"></textarea>
</template>

<script>
import { onMounted, ref, watch } from "vue";
export default {
    name: "CkEditor",
    props: ["content"],
    setup(props, { emmit }) {
        const content = ref(props.content);

        let ckEditor;
        onMounted(() => {
            ckEditor = window.CKEDITOR.replace("editor1");
            ckEditor.setData(content.value);
            ckEditor.on("chnage", () => {
                emmit("sendContent", ckEditor.getData);
            });
        });

        watch(content, () => {
            if (content.value !== ckEditor.getData()) {
                ckEditor.setData(content.value);
            }
        });
    },
};
</script>

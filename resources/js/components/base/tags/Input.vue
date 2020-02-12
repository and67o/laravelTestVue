<template>
    <div class="control-group">
        <label class="control-label" :for="target">{{nameField}}</label>
        <div class="controls">
            <input
                :type=target
                :name=target
                :id=type
                :placeholder=placeholder
                class="input-xlarge"
            >
        </div>
        <span v-if="error">{{error[0]}}</span>
    </div>
</template>
<script>
export default {
  props: [
    'target',
    'type',
    'placeholder',
    'model',
    'nameField',
    'error'
  ],
  data: function () {
    return {}
  },
  mounted () {
  },
  methods: {}
}
</script>

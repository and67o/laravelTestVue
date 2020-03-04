<template>
    <div class="control-group">
        <label class="control-label" :for="target">{{nameField}}</label>
        <div class="controls">
            <input
                :type=type
                :name=target
                :id=id
                :placeholder=placeholder
                @input="$emit('input', $event.target.value)"
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
    'nameField',
    'error',
    'id'
  ],
  model: {
    prop: 'value'
  },
  data: function () {
    return {}
  },
  mounted () {
  },
  methods: {}
}
</script>

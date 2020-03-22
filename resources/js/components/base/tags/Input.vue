<template>
    <div class="control-group">
        <label class="control-label" :for="target">
            {{nameField}}
        </label>
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
        <span
            class="text-danger"
            v-if="Object.keys(errors).length !== 0"
        >
            {{ getError(error) }}
        </span>

    </div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  props: {
    target: {
      type: String,
      default: ''
    },
    type: {
      type: String,
      default: ''
    },
    placeholder: {
      type: String,
      default: ''
    },
    nameField: {
      type: String,
      default: ''
    },
    error: {
      type: String,
      default: ''
    },
    id: {
      type: String,
      default: ''
    }
  },
  model: {
    prop: 'value'
  },
  computed: {
    ...mapGetters([
      'errors'
    ])
  },
  data: function () {
    return {}
  },
  mounted () {
  },
  methods: {
    getError (nameField) {
      return this.errors[nameField]
        ? this.errors[nameField][0]
        : ''
    }
  }
}
</script>

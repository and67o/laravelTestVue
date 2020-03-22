<template>
    <div class="control-group">
        <label class="control-label" :for="target">
            {{nameField}}
        </label>
            <div class="controls">
                <textarea
                    :name=target
                    :rows=rows
                    class="form-control"
                    @input="$emit('input', $event.target.value)"
                ></textarea>
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
    nameField: {
      type: String,
      default: ''
    },
    rows: {
      type: String,
      default: ''
    },
    error: {
      type: String,
      default: ''
    }
  },
  model: {
    prop: 'descr'
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

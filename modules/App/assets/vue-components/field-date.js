
let instanceCount = 0;

export default {

    _meta: {
        label: 'Date',
        info: 'Pick a date',
        icon: 'settings:assets/icons/date.svg'
    },

    data() {
        return {
            uid: `field-date-${++instanceCount}`,
            val: this.modelValue
        }
    },

    props: {
        modelValue: {
            type: String,
            default: ''
        },
        min: {
            type: String,
            default: null
        },
        max: {
            type: String,
            default: null
        },
        step: {
            default: null
        },
        readonly: {
            type: Boolean,
            default: null
        }
    },

    watch: {
        modelValue() {
            this.val = this.modelValue;
            this.update();
        }
    },

    template: /*html*/`
        <div field="date">
            <input type="date" class="kiss-input kiss-width-1-1" v-model="val" @input="update" :max="max" :min="min" :step="step" :readonly="readonly">
        </div>
    `,

    methods: {
        update() {
            this.$emit('update:modelValue', this.val)
        }
    }
}
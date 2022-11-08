<template>
    <v-form ref="form">
        <v-card class="mx-auto rounded-md pa-6" max-width="900" variant="outlined">
            <v-card-title class="mx-auto">Simple Form</v-card-title>
            <v-row>
                <v-col cols="12" md="6">
                    <v-text-field class="rounded-md" variant="outlined" @blur="handleBlur('firstname')" ref="firstname"
                        :rules="reqRules" v-model="firstname" label="First name">
                    </v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                    <v-text-field class="rounded-md" variant="outlined" @blur="handleBlur('lastname')" ref="lastname"
                        :rules="reqRules" v-model="lastname" label="Last name">
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" md="12">
                    <v-textarea class="rounded-md" variant="outlined" @blur="handleBlur('description')"
                        ref="description" :rules="reqRules" v-model="description" label="Small Description">
                    </v-textarea>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" md="12">
                    <v-text-field class="rounded-md" variant="outlined" @blur="handleBlur('email')" ref="email"
                        :rules="emailRules" v-model="email" label="Email Address" required>
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col v-for="image in images" cols="12" md="6">
                    <v-img class="bg-white" :aspect-ratio="16 / 9" :src="previewImage(image)" cover></v-img>
                </v-col>
            </v-row>
            <v-row class="d-none">
                <v-col cols="12" md="12">
                    <v-file-input multiple ref="uploader" accept="image/*" @change="onFileChanged"></v-file-input>
                </v-col>
            </v-row>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn variant="text" prepend-icon="mdi-plus" @click="handleFileImport">Add Image</v-btn>
                <v-btn variant="flat" color="info" :disabled="!valid" @click="this.submit()">Save</v-btn>
            </v-card-actions>
        </v-card>
        <v-dialog v-model="overlay" max-width="600">
            <v-row class="fill-height" align-content="center" justify="center" v-if="status == 'submitting'">
                <v-col class="text-subtitle-1 text-center text-white" cols="12">
                    Uploading Form
                </v-col>
                <v-col class="text-center" cols="3">
                    <v-progress-linear color="info" indeterminate>
                    </v-progress-linear>
                </v-col>
            </v-row>
            <v-card v-else-if="status == 'success'" class="info">
                <v-toolbar dark color="info">
                    <v-toolbar-title>
                        <v-icon icon="mdi-email-fast-outline"></v-icon> Email Sent
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon dark @click="overlay = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-card-text>
                    🎉 Email is successfully sent, please check your inbox for the form details
                </v-card-text>
            </v-card>
            <v-card v-else-if="status == 'failed'">
                <v-toolbar dark color="error">
                    <v-toolbar-title>
                        <v-icon icon="mdi-alert-octagon"></v-icon> Error
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon dark @click="overlay = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-card-text v-for="message in errors" class="info">
                    {{ message }}
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-form>
</template>
<script>
export default {
    data: () => ({
        valid: false,
        overlay: false,
        status: 'initial', // initial, submitting, success, failed
        errors: [],
        firstname: '',
        lastname: '',
        description: '',
        email: '',
        images: [],
        reqRules: [
            v => !!v || 'Field is required'
        ],
        emailRules: [
            v => !!v || 'Field is required',
            v => /.+@.+\..+/.test(v) || 'E-mail must be valid'
        ],
    }),
    methods: {
        handleBlur(field) {
            this.$refs[field].validate();
        },
        async checkFormValid() {
            const { valid } = await this.$refs.form.validate();
            this.valid = valid;
        },
        handleFileImport() {
            this.$refs.uploader.click();
        },
        onFileChanged(e) {
            this.images.push(e.target.files[0]);
        },
        previewImage(image) {
            return URL.createObjectURL(image);
        },
        submit() {
            this.overlay = true;
            this.status = 'submitting';
            let formData = new FormData();
            formData.append('firstname', this.firstname);
            formData.append('lastname', this.lastname);
            formData.append('description', this.description);
            formData.append('email', this.email);

            for (let index = 0; index < this.images.length; index++) {
                formData.append("images[]", this.images[index]);
            }
            let self = this;
            axios.post('/api/submit-form',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function () {
                self.status = 'success';
            }).catch(function (error) {
                self.errors = error.response.data.messages;
                self.status = 'failed';
            });
        }
    },
    watch: {
        firstname(e) {
            this.checkFormValid();
        },
        lastname(e) {
            this.checkFormValid();
        },
        description(e) {
            this.checkFormValid();
        },
        email(e) {
            this.checkFormValid();
        },
    }
}
</script>

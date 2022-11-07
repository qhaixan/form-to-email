<template>
    <v-form ref="form">
        <v-card class="mx-auto rounded-md pa-6" max-width="900" variant="outlined">
            <v-card-title class="mx-auto">Simple Form</v-card-title>
            <v-row>
                <v-col cols="12" md="6">
                    <v-text-field class="rounded-md" variant="outlined" v-model="firstname"
                        label="First name" required>
                    </v-text-field>
                </v-col>

                <v-col cols="12" md="6">
                    <v-text-field class="rounded-md" variant="outlined" v-model="lastname"
                        label="Last name" required>
                    </v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" md="12">
                    <v-textarea class="rounded-md" variant="outlined" v-model="description" label="Small Description">
                    </v-textarea>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" md="12">
                    <v-text-field class="rounded-md" variant="outlined" v-model="email" label="Email Address" required></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col v-for="image in images" cols="12" md="6">
                    <v-img
                        class="bg-white"
                        :aspect-ratio="16/9"
                        :src="previewImage(image)"
                        cover
                    ></v-img>
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
                <v-btn variant="flat" color="info" :disabled="!valid">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-form>
</template>
<script>
export default {
    data: () => ({
        valid: false,
        firstname: '',
        lastname: '',
        description: '',
        email: '',
        images: []
    }),
    methods: {
        checkFormValid() {
            if (!this.firstname) {
                this.valid = false;
            } else if (!this.lastname) {
                this.valid = false;
            } else if (!this.description) {
                this.valid = false;
            } else if (!/.+@.+\..+/.test(this.email)) {
                this.valid = false;
            } else {
                this.valid = true;
            }
        },
        handleFileImport() {
            this.$refs.uploader.click();
        },
        onFileChanged(e) {
            this.images.push(e.target.files[0]);
        },
        previewImage(image) {
            return URL.createObjectURL(image);
        }
    },
    watch: {
        firstname() {
            this.checkFormValid();
        },
        lastname() {
            this.checkFormValid();
        },
        description() {
            this.checkFormValid();
        },
        email() {
            this.checkFormValid();
        },
    }
}
</script>

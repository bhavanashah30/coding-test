<template>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-md-8">
            <p>Provide your details, so we can give you a call today!</p>
            <label>Name:</label>
            <input type="text" class="form-control" v-model="name"></input>
            <br/>
            <label>Email:</label>
            <input type="text" class="form-control" v-model="email"></input>
            <br/>
            <label>Phone:</label>
            <input type="text" class="form-control" v-model="phone"></input>
            <br/>
            <label>Address:</label>
            <input type="text" class="form-control" v-model="address"></input>
            <br/>
            <label>Source:</label>
            <input type="text" class="form-control" v-model="source"></input>
            <br/>
            <label>Budget:</label>
            <v-select :options="budgetOptions"  v-model="budget"></v-select>
            <br/>
            <button class="btn btn-danger" @click="onSubmit" :disabled="fieldsEmpty"> Submit</button>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                baseUrl: process.env.MIX_APP_URL,
                name: null,
                email: null,
                phone: null,
                address: null,
                source: null,
                budget: null,
                budgetOptions: [
                    '100,000 - 200,000',
                    '200,000 - 300,000',
                    '300,000 - 400,000',
                    '400,000 - 500,000',
                    '500,000 - 600,000',
                    '600,000 - 700,000'
                ]
            }
        },
        computed: {
            fieldsEmpty() {
                return !(this.name && this.email && this.phone && this.address && this.source && this.budget);
            }
        },
        methods: {
          onSubmit() {
              let url = this.baseUrl + '/saveInfo';
              axios.post(url, {data:
                  JSON.stringify({
                          name: this.name,
                          email: this.email,
                          phone: this.phone,
                          address: this.address,
                          source: this.source,
                          budget: this.budget
                      })})
                  .then(function (response) {
                      console.log(response.data);
                      swal2({
                          title: 'Success',
                          text: response.data,
                          confirmButtonColor: '#dd4b39',
                          type: 'success',
                          confirmButtonText: 'OK'
                      })
                          .then(function (result) {
                              window.location.reload();
                          })
                  })
                  .catch(function (error) {
                      swal2({
                          title: 'Error',
                          text: 'Error Saving Information, please try again later.',
                          confirmButtonColor: '#dd4b39',
                          type: 'error',
                          confirmButtonText: 'OK'
                      })
                          .then(function (result) {
                              window.location.reload();
                          })
                  })

          }
        }

    }
</script>

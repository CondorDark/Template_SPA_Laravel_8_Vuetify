<template>
  <v-container>
    <v-row> 
      <v-col cols="12">
        <v-card elevation="10" max-width="50%">
          <v-layout justify-center mt-15>
            <h1>Control De Acceso</h1>
          </v-layout>
          <v-layout justify-center mt-5 wrap>
            <v-flex>
              <v-row justify="center">
                <v-col cols="2">
                  <v-avatar 
                    color="primary" 
                    size="100"
                  >
                    <img
                      src="https://cdn.vuetifyjs.com/images/john.jpg"
                      alt="John"
                    >
                  </v-avatar>
                </v-col>
              </v-row>
              <v-row justify="center">
                <v-col cols="8">
                  <v-form>
                    <v-text-field
                      label="Usuario / Email"
                    >
                      <v-icon
                        slot="prepend"
                        color="red"
                      > mdi-account 
                      </v-icon>
                    </v-text-field>
                    <v-text-field
                      label="Contraseña"
                    >
                      <v-icon
                        slot="prepend"
                        color="red"
                      > mdi-form-textbox-password
                      </v-icon>
                    </v-text-field>
                  </v-form>
                </v-col>
              </v-row>
            </v-flex>
          </v-layout>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
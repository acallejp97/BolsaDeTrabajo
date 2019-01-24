<template>
  <!-- <div class="form-group">
      <div class="col-xs-11">
        <label for="password">
          <h4>Password</h4>
        </label>
        <input
          type="password"
          class="form-control"
          name="password1"
          id="password1"
          v-model="password"
          v-validate="'required'"
          placeholder="Contraseña"
          title="Introduce la contraseña."
        >
      </div>
    </div>
    <div class="form-group">
      <div class="col-xs-11">
        <label for="password2">
          <h4>Confirmar Contraseña</h4>
        </label>
        <input
          type="password"
          class="form-control"
          name="password2"
          id="password2"
          v-model="reenteredPassword"
          v-validate="'required|confirmed:password'"
          placeholder="Repite Contraseña"
          title="Confirma tu contraseña por favor."
        >
      </div>
    </div>
    <div v-show="passwords.reenteredPassword.dirty">
      <div v-show="passwords.reenteredPassword.match">doesn't match password</div>
    </div>
  -->
  <div id="app">
    <md-input-container :class="{'md-input-invalid': errors.has('password')}">
      <label for="password">Password</label>
      <md-input
        v-model="credentials.password"
        data-vv-name="password"
        type="password"
        v-validate
        name="password"
        data-vv-rules="required|min:5"
      ></md-input>
      <span class="md-error">{{errors.first('password')}}</span>
    </md-input-container>

    <md-input-container :class="{'md-input-invalid': errors.has('confirm-password')}">
      <label for="password">Confirm Password</label>

      <md-input
        v-model="credentials.confirmPassword"
        data-vv-name="confirm-password"
        type="password"
        v-validate
        name="password"
        data-vv-rules="confirmed:password"
      ></md-input>
      <span class="md-error">{{errors.first('confirm-password')}}</span>
    </md-input-container>
  </div>
</template>
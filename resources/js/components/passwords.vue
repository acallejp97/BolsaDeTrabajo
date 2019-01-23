<template>
  <div id="passwords">
    <div class="form-group">
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
    <!-- <div v-if="passwords.reenteredPassword.dirty">
        <div v-if="passwords.reenteredPassword.match">doesn't match password</div>
    </div> -->
  </div>
</template>
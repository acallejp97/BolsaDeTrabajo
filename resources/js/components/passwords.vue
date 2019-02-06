 <template>
  <div id="passwords">
    <div class="form-group">
      <div class="col-xs-11">
        <label for="password">
          <h4>Password</h4>
        </label>
        <input
          v-validate="'required'"
          id="password"
          name="password"
          type="password"
          :class="{'is-danger': errors.has('password')}"
          class="form-control"
          placeholder="Password"
          ref="password"
        >
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-11">
        <label for="password2">
          <h4>Confirmar Contraseña</h4>
        </label>
        <input
          v-validate="'required|confirmed:password'"
          name="password_confirmation"
          id="password2"
          type="password"
          :class="{'is-danger': errors.has('password_confirmation')}"
          class="form-control"
          placeholder="Password, Again"
          data-vv-as="password"
        >
      </div>
      <div class="alert alert-danger" v-show="errors.any()">
        <div v-if="errors.has('password')">{{ errors.first('password') }}</div>
        <div v-if="errors.has('password_confirmation')">{{ errors.first('password_confirmation') }}</div>
      </div>
    </div>
  </div>
</template>
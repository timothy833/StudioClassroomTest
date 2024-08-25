import { createStore } from "vuex";

export const store = createStore({
  state(){
    return {
      counter: 0
    }
  },
  mutations:{
    increase(state){
      state.counter++;
    },
    decrease(state){
      state.counter--;
    },
  }
});
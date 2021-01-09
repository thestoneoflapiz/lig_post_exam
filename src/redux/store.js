import { createStore, applyMiddleware } from 'redux';
import rootReducer from './modules/reducer';
import thunk from 'redux-thunk';

export default createStore(
  rootReducer,
  applyMiddleware(thunk)
);

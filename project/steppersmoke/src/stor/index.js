import { composeWithDevTools } from 'redux-devtools-extension';
import {combineReducers,createStore, applyMiddleware} from 'redux';

import thunk from 'redux-thunk';
import * as stepper from '../reducer';

const rootReducer = combineReducers({...stepper});


export default createStore(rootReducer,composeWithDevTools(applyMiddleware(thunk)));
/*
	Estos estilos los utilizo en otras aplicaciones del universo monteserin
*/

import styled, { createGlobalStyle, css } from 'styled-components';
import closeBtn from './img/close-btn.png';

const desktopStartWidth = 996;

export const desktop = `@media (min-width: ${desktopStartWidth}px)`;
export const mobile = `@media (max-width: ${desktopStartWidth}px)`;

const MargenesComunes = css `
   margin-top: ${props => props.mt == '1' ? '10px' : '0'};
   margin-bottom: ${props => props.mb == '1' ? '10px' : '0'};
`;

export const GlobalStyleMonteserin = createGlobalStyle `
	body {
		height: 100vh;
		margin: 0; 
		font-family: 'open-sans';
		display: flex; 
		justify-content: center; 
		align-items: center;
		background-size:cover;
		background-position: center center
	}
`;

const InputsComunes = css `
	padding:10px;
	width: 100%;
	font-size: 1.2rem;
	box-sizing: border-box;
	border-radius:3px;
	border: none;
	min-width:${props => props.width}px;
	${MargenesComunes};
`;



export const Btn = styled.button `
   background-color: #ff7020;
   color: white;
   font-weight: bold;
   cursor:pointer;
   ${InputsComunes}
`;

export const Input = styled.input `
	${InputsComunes}
`;

export const Password = styled.input.attrs({
    type: "password"
})
`
	${InputsComunes}
`;

// row-3-9
export const Panel = styled.div `
   display:grid;
   align-items: center;
   max-height:100%;
   justify-content: space-between;
   align-items: stretch;
   grid-row-gap: 10px;
   grid-column-gap: 10px;
   background-color: ${props => props.backgroundColor};
   grid-template-columns: ${props => props.distribution == '3-3-3-3' ? '1fr 1fr 1fr 1fr' :
        props.distribution == '3-9' ? '1fr 3fr' :
            props.distribution == '9-3' ? '3fr 1fr' :
                props.distribution == '6-6' ? '1fr 1fr' : '1fr'};
	box-sizing: border-box;
	max-height:0;
	overflow:hidden;
	opacity:0;
	transition:0.4s;
	${props => props.visible == true || props.visible == null || typeof props.visible === undefined ? 'opacity:1; max-height:800px' : 'opacity:0; max-height:0'};
	${MargenesComunes};
	${props => props.isContainer ? 'margin:auto; max-width:1200px' : 'max-width:100%'}
	${mobile}{
		grid-template-columns: 1fr
	}
`;

export const P2 = styled.p `
	margin:0;   
	${InputsComunes};
`;


export const Close = styled.div `
	border-radius:100%;
	width:20px;
	height:20px;
	color: white;
	background-image:url(${closeBtn});
	font-weight: bold;
	position:absolute;
	z-index: 1;
	top:0;
	right:0;
  	background-size: 100% 100%;
	background-repeat: no-repeat;
	cursor: pointer;
`;
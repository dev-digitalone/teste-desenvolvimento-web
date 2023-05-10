import { createGlobalStyle } from 'styled-components'

export default createGlobalStyle`
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto Slab', serif;
  }
  body {
    background-color: ${({ theme }) => theme.COLORS.BACKGROUND_900};
    color: ${({ theme }) => theme.COLORS.WHITE};
    
    -webkit-font-smoothing: antialiased;
  }
  border-style, input, button, textarea {
    font-size: 16px;
    outline: none;
  }
  a {
    text-decoration: none;
  }
  button, a {
    cursor: pointer;
    transition: all 0.2s ease;
    opacity: 0.9;
    filter: brightness(1);
  }
  button:hover, a:hover {
    opacity: 1;
    filter: brightness(1.1);
    color: ${({theme}) => theme.COLORS.WHITE};
    
  }
`
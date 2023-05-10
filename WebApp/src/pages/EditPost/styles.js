import styled from 'styled-components'

export const Container = styled.div`
  width: 100%;
  height: 100vh;

  display: grid;
  grid-template-rows: 105px auto;
  grid-template-areas:
  'header'
  'content';

  > main {
    grid-area: content;
    overflow-y: auto;
    padding: 64px 0;
  }
`

export const Content = styled.div`
  max-width: 600px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  gap: 20px;

  > div {
    display: flex;
    align-items: center;
    justify-content: space-between;

    button {
      width: fit-content;
      background-color: red;
    }
  }

  > h1 {
    font-size: 36px;
    font-weight: 500;
    margin-top: 30px;
  }

  > p {
    font-size: 16px;
    text-align: justify;
  }

  a {
    text-decoration: none;
    color: ${({theme}) => theme.COLORS.WHITE};
  }
`
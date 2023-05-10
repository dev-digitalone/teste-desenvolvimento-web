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
  }

  .tags {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-gap: 10px;
  }
`
export const Form = styled.form`
  max-width: 600px;
  margin: 38px auto;
  display: flex;
  flex-direction: column;
  gap: 10px;

  > header {
   
    justify-content: space-between;
    text-align: center;

    margin-bottom: 20px;

    button {
      font-size: 20px;
      color: ${({ theme }) => theme.COLORS.GRAY_100};
      
      transition: all 0.2s;
    }
  }
`
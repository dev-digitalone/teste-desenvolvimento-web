import styled from 'styled-components'

export const Container = styled.div`
  width: 100%;
  height: 100vh;

  display: flex;
  flex-direction: column;
`

export const Content = styled.div`
  width: 70%;
  margin: 0 auto;
  overflow-y: auto;
  ::-webkit-scrollbar {
    width: 4px;
  }

  ::-webkit-scrollbar-track {
    background: ${({theme}) => theme.COLORS.BACKGROUND_700};
  }

  ::-webkit-scrollbar-thumb {
    background: ${({ theme }) => theme.COLORS.BLUE};
    border-radius: 30px;
  }
`

export const NewPost = styled.div`
  width: fit-content;
  position: fixed;
  top: 15%; 
  margin-left: 10%;
`
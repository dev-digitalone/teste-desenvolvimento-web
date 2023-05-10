import styled from 'styled-components'

import backgroundImg from '../../assets/bg-sign-in.jpg'

export const Container = styled.div`
  height: 100vh;

  display: flex;
  align-items: stretch;
`

export const Form = styled.form`
  padding: 0 130px;

  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  > header {
    text-align: center;
    h1 {
      font-size: 48px;
      color: ${({ theme }) => theme.COLORS.BLUE};
      text-shadow: 1px 1px 5px ${({ theme }) => theme.COLORS.BLUE};
    }

    h2 {
      font-size: 24px;

      margin: 48px 0;
      font-weight: 500;
    }

    p {
      font-size: 16px;
      color: ${({ theme }) => theme.COLORS.GRAY_100};
    }
  }

  > a {
    margin: 0 0 30px;
  }

  > Button {
    margin: 20px 0 40px;
  }
`
export const Background = styled.div`
  flex: 1;
  background: url(${backgroundImg}) no-repeat center center;
  background-size: cover;
`

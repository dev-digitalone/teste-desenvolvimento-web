import styled from 'styled-components'

export const Container = styled.header`
  grid-area: header;

  min-height: 115px;
  width: 100%;

  border-bottom-width: 1px;
  border-bottom-style: solid;
  border-bottom-color: ${({ theme }) => theme.COLORS.BACKGROUND_700};

  display: flex;
  align-items: center;
  justify-content: space-between;
`

export const Brand = styled.div`
  grid-area: brand;
  display: flex;
  align-items: center;
  gap: 10px;
  padding-left: 10%;
  > h1 {
    color: ${({theme}) => theme.COLORS.BLUE};
    white-space: nowrap;
    text-shadow: 1px 1px 3px ${({theme}) => theme.COLORS.BLUE};
  }
  > img {
    width: 50px;
  }
`

export const Profile = styled.div`
  padding-right: 10%;
  grid-area: profile;
  display: flex;
  align-items: center;
  white-space: nowrap;

  gap: 5px;

  flex-direction: column;
  h3 {
    font-size: 20px;
  }

  a {
    display: flex;
    align-items: center;
    gap: 5px;

    > strong {
      color: ${({theme}) => theme.COLORS.GRAY_100};
    }
  }
`
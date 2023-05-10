import styled from "styled-components";

export const Container = styled.div`
  margin: 20px auto;
  width: 600px;
  min-height: 300px;
  background-color: ${({theme}) => theme.COLORS.BACKGROUND_800};

  border-radius: 10px;
  border-width: 4px;
  border-style: solid;
  border-color: ${({ theme }) => theme.COLORS.BACKGROUND_700};
`

export const Content = styled.div`
  grid-area: content;
  margin: 30px 30px auto;

  .title {
    margin: 10px 0;
  }
`
export const Header = styled.div`
  display: flex;
  justify-content: space-between;

  .author {
    display: flex;
    align-items: start;
    flex-direction: column;
    gap: 10px;
    color: ${({ theme }) => theme.COLORS.GRAY_100};

    svg {
      color: ${({ theme }) => theme.COLORS.GREEN};
      font-size: 25px;
    }
  }

  .date{
    display: flex;
    align-items: center;
    gap: 5px;
  }
`
export const Controls = styled.div`
  display: flex;
  align-items: center;
  gap: 10px;
`

export const Text = styled.div`
  grid-area: text;
  margin-right: 20px;

  color: ${({ theme }) => theme.COLORS.GRAY_100};

  > p {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
  }
`

export const ImgUrl = styled.div`
  width: 100%;
  background-color: ${({theme}) => theme.COLORS.BACKGROUND_700};
  padding: 15px;
  border-radius: 5px;
  a {
    text-decoration: none;
    color: ${({theme}) => theme.COLORS.WHITE};
    font-size: 18px;
  }
`
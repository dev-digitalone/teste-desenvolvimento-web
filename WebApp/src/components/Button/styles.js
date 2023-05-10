import styled from 'styled-components'

export const Container = styled.button`
  width: 100%;
  background-color: ${({ theme }) => theme.COLORS.BLUE};
  color: ${({ theme }) => theme.COLORS.WHITE};

  height: 56px;
  border: 0;
  padding: 0 16px;
  border-radius: 10px;
  font-weight: 500;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;

  &:disabled {
    opacity: 0.5;
  }
`
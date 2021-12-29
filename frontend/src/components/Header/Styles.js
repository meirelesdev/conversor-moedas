import styled from "styled-components";

export const Header = styled.header`
    display: flex;
    flex-direction: column;
    align-items: center;
    
    @media (min-width: 525px) {
        flex-direction: row;
        justify-content: space-evenly;
        min-height: 100px;
    }
`
export const Logo = styled.div`
    margin: 10px;
    text-align: center;
    font-size: 2rem;
    & a {
        color: ${({theme}) => theme.colors.text.primary}; 
    }
`
export const Nav = styled.nav`
    display: flex;
    justify-content: space-between;

    & a {
        margin: 10px;
        color: ${({theme}) => theme.colors.text.primary}; 
        &:hover {
            color: ${({theme}) => theme.colors.text.primary}; 
            text-shadow: 1px 1px white;
        }
    }
`
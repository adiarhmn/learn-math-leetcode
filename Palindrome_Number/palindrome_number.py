# ID:
# Tantangan 1: Palindrome Number
# Link: https://leetcode.com/problems/palindrome-number/
# Difficulty: Easy
# Tanggal: 2021-08-26
# ==================================
# Apa itu Palindrome Number? Palindrome Number adalah suatu bilangan yang jika dibalik, bilangan tersebut tetap sama.
# Contoh:
# 121 adalah Palindrome Number
# -121 bukan Palindrome Number
# 10 bukan Palindrome Number
# -101 bukan Palindrome Number

# ==================================
# Cara penyelesaian:
# Diberikan suatu bilangan bulat x, tentukan apakah x adalah Palindrome Number.
# ==================================


def is_palindrome(x: int) -> bool:
    if(x < 0):
        return False
    else:
        return x == int(str(x)[::-1])
# str(x)[::-1]
# str(x) adalah mengubah bilangan x menjadi string
# [::-1] adalah mengubah string tersebut menjadi string yang dibalik atau disebut reverse string
# int() adalah mengubah string tersebut menjadi integer


# Test case
print(is_palindrome(1221))  # True 
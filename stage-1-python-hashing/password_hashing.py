import hashlib

def add_pepper(password):
    """
    Adds a number BEFORE every 3 characters.
    Example:
    admin@123 -> 0adm4in@8123
    """
    peppered_password = ""
    pepper_value = 0

    for i in range(0, len(password), 3):
        peppered_password += str(pepper_value)
        peppered_password += password[i:i+3]
        pepper_value += 4   # increment by 4 to match your example

    return peppered_password


def md5_hash(data):
    return hashlib.md5(data.encode()).hexdigest()


# -------- Main Program --------
password = input("Enter your password: ")

peppered = add_pepper(password)
hashed_password = md5_hash(peppered)

print("\n--- Password Security Process ---")
print("Original Password :", password)
print("After Pepper Added:", peppered)
print("MD5 Hash          :", hashed_password)

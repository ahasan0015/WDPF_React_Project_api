export interface User {
  userId: number,
  roleId?: number,
  name: string,
  email: string,
  password: string,
  phone?: string,
  createdAt: string,
}

const userDefault: User = {
  userId: 0,
  roleId: 0,
  name: "",
  email: "",
  password: "",
  phone: "",
  createdAt: "",
};

export default userDefault;

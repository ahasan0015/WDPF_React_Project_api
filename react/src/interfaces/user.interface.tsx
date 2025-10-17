export interface User {
  id: number,
  roleId?: number,
  name: string,
  email: string,
  password: string,
  phone?: string,
  createdAt: string,
}

const userDefault: User = {
  id: 0,
  roleId: 0,
  name: "",
  email: "",
  password: "",
  phone: "",
  createdAt: "",
};

export default userDefault;
